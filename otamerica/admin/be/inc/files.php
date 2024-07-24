<?php
class Files {
  function save($filename, $folder, $newName = null){
    // Valid file extensions
    $valid_extensions = array("jpg", "jpeg", "png", "pdf","xlsx","xls");

    // File extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // Check extension
    if (in_array(strtolower($extension), $valid_extensions)) {
      $fName = isset($newName) ? $folder . $newName .  '.'. $extension : $folder.$filename;
      $fFiles = "../../../files/";
      // Upload file
      if (move_uploaded_file($_FILES['file']['tmp_name'], $fFiles .$fName )) {
        return $fName;
      } else {
        return false;
      }
    } else {
      return "else del extension";
      //return false;
    }
  }
}