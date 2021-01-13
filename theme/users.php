<?php include 'inc/header.php';?>

        <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    	<div class="page-title">
                    		<h1>Users</h1>
                    	</div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card mb-3">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img src="img/profile.jpg" class="card-img" alt="..." style="padding: 0.8rem">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5>John Doe</h5>
                                                        <span>Manager</span><a href="#" class="material-icons">create</a><br>
                                                        <p>john.doe@gmail.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card mb-3">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img src="img/profile.jpg" class="card-img" alt="..." style="padding: 0.8rem">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5>John Doe</h5>
                                                        <span>Manager</span><a href="#" class="material-icons">create</a><br>
                                                        <p>john.doe@gmail.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="user-create-area">
                                    Create New Team Member
                                    <form>
                                        <input type="text" placeholder="Full name">
                                        <input type="email" placeholder="Email">
                                        <select>
                                            <option>Manager</option>
                                            <option>Editor</option>
                                            <option>Viewer</option>
                                        </select>
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
