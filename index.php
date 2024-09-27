<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online Resume Builder</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h2>Online Resume Builder</h2>
     <form action="generate_resume.php" method="POST" enctype="multipart/form-data">
     	<label for="name">Full Name</label>
     	<input type="text" id="name" name="name" required>

     	<label for="email">Email</label>
     	<input type="email" id="email" name="email" required>

     	<label for="phone">Phone Number</label>
     	<input type="text" name="phone" id="phone" required>

     	<label for="address">Address</label>
     	<input type="text" name="address" id="address" required>

     	<label for="summary">Profile Summary</label>
     	<textarea type="text" name="summary" id="summary" placeholder="Write a short summary about yourself..." required></textarea>

     	<label for="education">Education</label>
     	<textarea type="text" name="education" id="education" placeholder="List your educational background..." required></textarea>

     	<label for="experience">Work Experience</label>
     	<textarea type="text" name="experience" id="experience" placeholder="Describe your work experience..." required></textarea>

     	<label for="skills">Skills</label>
     	<textarea type="text" name="skills" id="skills" placeholder="List your skills..." required></textarea>
        

        <label for="profile_picture">Upload Profile Picture</label>
     	<input type="file" name="profile_picture" id="profile_picture" required>

     	<button type="submit">Generate Resume</button>

     </form>
</body>
</html>