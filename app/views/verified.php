<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>

    <!-- Include Bootstrap CSS from a CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #b29062, #f3e5d6); /* Gradient background using shades of brown */
            color: #333;
            font-family: 'Poppins', sans-serif; /* Updated font to Poppins */
        }

        .container {
            max-width: 600px;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border: 2px solid #a0754c; /* Border matching specified color */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #a0754c; /* Header color matching border */
        }

        .form-label {
            color: #333;
        }

        .form-control {
            border: 2px solid #a0754c; /* Border color for input fields */
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #b29062; /* Focus border color */
        }

        /* Submit button custom color matching background */
        .btn-primary {
            background-color: #a0754c; /* Brown for the Submit button */
            border: none;
            color: white; /* White text color for contrast */
        }

        .btn-primary:hover {
            background-color: #8a6240; /* Darker brown on hover */
        }

        .form-text {
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Welcome</h1>
        <form action="/upload" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="fileToUpload" class="form-label">Select file to upload:</label>
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" 
                       accept=".jpg, .jpeg, .png, .gif, .pdf, .doc, .docx, .ppt, .pptx, .xls, .xlsx" required>
                <small class="form-text">Allowed file types: JPG, PNG, GIF, PDF, DOC, DOCX</small>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" required>
                <small class="form-text">We'll never share your email with anyone else.</small>
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subject:</label>
                <input type="text" class="form-control" name="subject" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea class="form-control" name="content" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Include Bootstrap JS from a CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
