<?php
include "config.php";
$action = $_GET['action'] ?? '';

if ($action == "fetch") {
    $category = $_GET['category'];
    $result = $conn->query("SELECT * FROM sliders WHERE category='$category'");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $row['image'] = $row['image'] ? $row['image'] : 'files/images/default.jpg';
        $data[] = $row;
    }
    echo json_encode($data);
}

if ($action == "add") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $imagePath = "";

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "files/images/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    $stmt = $conn->prepare("INSERT INTO sliders (title, image, category) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $imagePath, $category);
    $stmt->execute();
    echo json_encode(["success" => true]);
}

if ($action == "update") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $existingImage = $_POST['existingImage'];
    $imagePath = $existingImage;

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "files/images/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    $stmt = $conn->prepare("UPDATE sliders SET title=?, image=?, category=? WHERE id=?");
    $stmt->bind_param("sssi", $title, $imagePath, $category, $id);
    $stmt->execute();
    echo json_encode(["success" => true]);
}
if ($action == "delete") {
    $id = $_POST['id'];

    $result = $conn->query("SELECT image FROM sliders WHERE id=$id");
    $row = $result->fetch_assoc();
    if ($row && file_exists($row['image'])) unlink($row['image']);

    $conn->query("DELETE FROM sliders WHERE id=$id");
    echo json_encode(["success" => true]);
}
?>
