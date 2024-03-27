<!DOCTYPE html>
<html lang="en">

<?php 
require '../includes/dbConnect.php';?> 
<?php require('../includes/loginSession.php');?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .padding-custom {
            padding: 0 12rem 2rem 12rem;
        }
    </style>
    <title>editProperty</title>
</head>

<body>

    <!-- SIDEBAR AND MAIN CONTENT -->
    <div class="d-flex">
        <!-- SIDEBAR -->
        <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasSidebar"
            aria-labelledby="offcanvasSidebarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="d-flex align-items-center px-4 pb-6">
                    <img class="rounded-circle" src="/img/yujan.jpg" alt="photo" width="56" height="56">
                    <div class="ms-3">
                        <h3 class="fw-bold">Yujan Rai</h3>
                        <p class="text-muted mb-0">User</p>
                    </div>
                </div>
                <div class="list-group list-group-flush">
                    <a href="index.php" class="list-group-item list-group-item-action bg-transparent text-white"><i
                            class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="addProperty.html"
                        class="list-group-item list-group-item-action bg-transparent text-white"><i
                            class="fas fa-plus-circle me-2"></i>Add Properties</a>
                    <a href="mProperties.html"
                        class="list-group-item list-group-item-action bg-transparent text-white"><i
                            class="fas fa-house-flag me-2"></i>My Properties</a>
                    <a href="soldProperties.php"
                        class="list-group-item list-group-item-action bg-transparent text-white"><i
                            class="fas fa-house-circle-check me-2"></i>Sold Properties</a>
                    <a href="editProfile.php"
                        class="list-group-item list-group-item-action bg-transparent text-white "><i
                            class="fas fa-user-pen me-2"></i>Edit Profile</a>
                    <a href="notification.html"
                        class="list-group-item list-group-item-action bg-transparent text-white"><i
                            class="fas fa-bell me-2"></i>Notification</a>
                    <form action="">
                        <button>
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <h3>logout</h3>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <main class="flex-grow-1 padding-custom bg-light">
            <!----------write a code below this for  responsive design---------->
            <h1 class="mb-4">Add Property</h1>
            <hr>
            <!--From here-->

            <div class="card">
                <div class="card-body">
                    <h2 class="mb-4">Description</h2>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Property Title *</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter your property title" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Property Details</label>
                            <div class="border rounded p-2">
                                <div class="d-flex justify-content-between align-items-center pb-2 border-bottom">
                                    <div class="btn-toolbar" role="toolbar"
                                        aria-label="Formatting options for text editor">
                                        <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fas fa-bold"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fas fa-italic"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fas fa-underline"></i></button>
                                        </div>
                                        <div class="btn-group me-2 mb-2" role="group" aria-label="Second group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fas fa-align-left"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fas fa-align-center"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fas fa-align-right"></i></button>
                                        </div>
                                        <div class="btn-group mb-2" role="group" aria-label="Third group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fas fa-link"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fas fa-image"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <textarea id="editor" rows="8" class="form-control"
                                        placeholder="Write an article..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category *</label>
                            <select class="form-select" aria-label="Select category">
                                <option selected>Select Category</option>
                                <option value="rent">Rent</option>
                                <option value="sell">Sell</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Property *</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="room" value="room">
                                <label class="form-check-label" for="room">Room</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="flat" value="flat" checked>
                                <label class="form-check-label" for="flat">Flat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="house" value="house" checked>
                                <label class="form-check-label" for="house">House</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="kitchen" class="form-label">Kitchen</label>
                                <input type="number" name="kitchen" id="kitchen" class="form-control"
                                    placeholder="Enter Number Of Kitchen">
                            </div>
                            <div class="col-md-6">
                                <label for="bedrooms" class="form-label">Bed Rooms</label>
                                <input type="number" name="bedrooms" id="bedrooms" class="form-control"
                                    placeholder="Enter Number Of Bed Rooms">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="bedroom" class="form-label">Bed Room</label>
                                <input type="number" name="bedroom" id="bedroom" class="form-control"
                                    placeholder="Enter Number Of Bedroom">
                            </div>
                            <div class="col-md-6">
                                <label for="livingroom" class="form-label">Living Room</label>
                                <input type="number" name="livingroom" id="livingroom" class="form-control"
                                    placeholder="Enter Number Of Living Room">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="floor" class="form-label">Floor</label>
                                <input type="number" name="floor" id="floor" class="form-control"
                                    placeholder="Enter Floor Number">
                            </div>
                            <div class="col-md-6">
                                <label for="parking" class="form-label">Parking</label>
                                <input type="number" name="parking" id="parking" class="form-control"
                                    placeholder="Enter Number Of Parking">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="area" class="form-label">Total Area *</label>
                                <input type="text" name="area" id="area" class="form-control"
                                    placeholder="Enter Area in Sq. ft." required>
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">Total Price *</label>
                                <input type="text" name="price" id="price" class="form-control"
                                    placeholder="Enter Total Price" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" id="location" class="form-control"
                                    placeholder="Enter Location (City, State)" required>
                            </div>
                            <div class="col-md-6">
                                <label for="expiryDate" class="form-label">Expiry Date</label>
                                <input type="date" name="expiryDate" id="expiryDate" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="media" class="form-label">Media</label>
                            <div class="border border-dashed rounded p-4 text-center upload-area">
                                <label for="fileInput" class="form-label">Upload File</label>
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <input type="file" class="form-control mb-3" id="fileInput" name="file"
                                        style="display: none;">
                                    <label for="fileInput" class="cloud-upload-label">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                    </label>
                                    <p class="text-muted">Click the cloud icon to upload or drag and drop</p>
                                    <p>Image dimensions exceed the maximum allowed size (1080x720px). Please choose a
                                        smaller image.</p>
                                    <img src="#" alt="Uploaded Image" id="previewImage"
                                        style="max-width: 100%; display: none;">
                                </div>
                            </div>
                        </div>

                </div>

                <div class="d-none alert alert-danger" id="alert" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle me-3"></i>
                        <p class="mb-0">Image dimensions exceed the maximum allowed size (1080x720px). Please
                            choose a smaller image.</p>
                    </div>
                    <button type="button" class="btn-close" id="close-alert" aria-label="Close"></button>
                </div>

                <div class="m-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-3">Submit</button>
                    <button type="button" class="btn btn-danger" id="cancel-button">Cancel</button>
                </div>
                </form>
            </div>
    </div>

    <!----------write a code above this for  responsive design---------->
    </main>
    </div>
    <!-- SIDEBAR AND MAIN CONTENT END -->

    <!-- Additional scripts and links -->
    <script src="src/script.js"></script>
    <script src="src/imageAdd.js"></script>
    <script src="src/alert.js"></script>
    <script>
        const fileInput = document.getElementById('fileInput');
        const previewImage = document.getElementById('previewImage');
        const uploadArea = document.querySelector('.upload-area');

        uploadArea.addEventListener('click', function () {
            fileInput.click();
        });

        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                if (file.size > 1024 * 720) {
                    alert("Please Enter image upto 1024px * 720px.");
                    this.value = null;
                    return;
                }
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        document.getElementById("cancel-button").addEventListener("click", function () {
            history.back();
        });
    </script>
</body>

</html>