<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Stack Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-4">
        <h2 id="sliderTitle">Technology</h2>
        <ul id="tabMenu" class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-category="Technology" onclick="switchTab(this)">Technology</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-category="Education" onclick="switchTab(this)">Education</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-category="Innovation" onclick="switchTab(this)">Innovation</a>
            </li>
        </ul>
        <div class="row mt-3">
            <div class="col-md-6">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="sliderItems"></div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>

        <h4 class="mt-4">Add / Edit Slider</h4>
        <input type="hidden" id="sliderId">
        <input type="text" id="title" placeholder="Title" class="form-control mb-2">
        <input type="hidden" id="existingImage">
        <input type="file" id="image" class="form-control mb-2">
        <select id="category" class="form-control mb-2">
            <option value="Technology">Technology</option>
            <option value="Education">Education</option>
            <option value="Innovation">Innovation</option>
        </select>
        <button id="saveButton" class="btn btn-primary" onclick="addOrUpdateSlider()">Save</button>
        <h4 class="mt-4">Slider List</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="sliderTable"></tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
