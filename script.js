let currentCategory = "Technology";
$(document).ready(function () {
    loadSliders();
    $(".nav-link").removeClass("active");
    $(".nav-link[data-category='Technology']").addClass("active");
});

function switchTab(tabElement) {
    $(".nav-link").removeClass("active");
    $(tabElement).addClass("active");
    currentCategory = $(tabElement).data("category");
    $("#sliderTitle").text(currentCategory);
    loadSliders();
}

function loadSliders() {
    $.get("api.php?action=fetch&category=" + currentCategory, function (data) {
        let sliders = JSON.parse(data);
        let sliderTable = "";
        let sliderItems = "";

        if (sliders.length === 0) {
            $("#carouselExample").hide();
        } else {
            $("#carouselExample").show();
            sliders.forEach((slider, index) => {
                let activeClass = index === 0 ? "active" : "";
                sliderTable += `<tr>
                    <td>${slider.title}</td>
                    <td><img src="${slider.image}" width="50"></td>
                    <td>${slider.category}</td>
                    <td>
                        <button onclick="editSlider(${slider.id}, '${slider.title}', '${slider.image}', '${slider.category}')" class="btn btn-warning btn-sm">Edit</button>
                        <button onclick="deleteSlider(${slider.id})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>`;

                sliderItems += `
                    <div class="carousel-item ${activeClass}">
                        <img src="${slider.image}" class="d-block w-100" style="" alt="${slider.title}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>${slider.title}</h5>
                        </div>
                    </div>`;
            });
        }

        $("#sliderTable").html(sliderTable);
        $("#sliderItems").html(sliderItems);
    });
}

function addOrUpdateSlider() {
    let id = $("#sliderId").val();
    let title = $("#title").val();
    let category = $("#category").val();
    let existingImage = $("#existingImage").val();
    let formData = new FormData();
    
    formData.append("id", id);
    formData.append("title", title);
    formData.append("category", category);
    formData.append("existingImage", existingImage);
    
    if ($("#image")[0].files.length > 0) {
        formData.append("image", $("#image")[0].files[0]);
    }

    let action = id ? "update" : "add";

    $.ajax({
        url: "api.php?action=" + action,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function () {
            loadSliders();
            resetForm();
        }
    });
}

function resetForm() {
    $("#title").val("");
    $("#image").val("");
    $("#category").val("Technology");
    $("#sliderId").val("");
    $("#saveButton").text("Save");
}

function deleteSlider(id) {
    $.post("api.php?action=delete", { id: id }, function () {
        loadSliders();
    });
}

function editSlider(id, title, image, category) {
    $("#title").val(title);
    $("#category").val(category);
    $("#sliderId").val(id);
    $("#existingImage").val(image);
    $("#saveButton").text("Update");
}
