<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload System</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <!-- Header secction -->
  <div class="header">
    <div class="navbar">
      <h3>Logo</h3>
      <li onclick="showSection('dashboard')">Dashboard</li>
      <li onclick="showSection('upload')">Upload Files</li>
      <li onclick="showSection('files')">My Files</li>
    </div>
  </div>

  <!-- Content section -->
  <div class="content">
    <div id="dashboard" class="section">
      <h2>Dashboard</h2>
    </div>
    <div id="upload" class="section">
      <h2>Upload Files</h2>
      <div class="uploadForm">
      <fieldset>
        <legend>File Upload</legend>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
          <div class="formRow">
            <input type="file" name="file">
            <br><br>
            <button type="submit" name="submit">Upload</button>
          </div>
        </form>
      </fieldset>
    </div>
    </div>
    <div id="files" class="section">
      <h2>My Files</h2>
      <?php
        $result = $conn->query("SELECT * FROM files");
        while ($row = $result->fetch_assoc()) {
          echo "<div><a href='../uploads/" . $row['filename'] . "' target='_blank'>" . $row['filename'] . "</a></div>";
        }
      ?>
    </div>
  </div>
  <script>
    function showSection(id) {
        let sections = document.querySelectorAll(".section");

        sections.forEach(function(section) {
            section.style.display = "none";
        });

        document.getElementById(id).style.display = "block";
    }
  </script>

  <!-- Footer section -->
  <div class="footer">

  </div>
</body>
</html>