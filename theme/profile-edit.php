<?php include 'inc/header.php';?>

        <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    	<div class="page-title">
                    		<h1>Profile</h1>
                    	</div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="profile-field">
                                    <form>
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url(img/profile.jpg);">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" value="John Doe">
                                        <input type="email" value="john.doe@gmail.com">
                                        <input type="text" value="Manager">
                                        <button type="submit">save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      
<?php include 'inc/footer.php';?>
