<?php include 'inc/header.php';?>

        <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    	<div class="page-title">
                    		<h1>add new term</h1>
                    	</div>
                        <div class="main-content create-context">
                            <div class="english-context">
                                <h5>English</h5>
                                <div class="first-row">
                                    <input type="text" placeholder="Source">
                                </div>
                                <div class="second-row">
                                    <select id='article-title-eng'>
                                        <option></option>
                                       <option value='1'>Facing Fees, Some Sites Are Bypassing Google Maps</option>
                                       <option value='2'>When it comes to offering online maps to their users</option>
                                       <option value='3'>In the seven years since it was introduced</option>
                                    </select>
                                </div>
                                <input type="text" placeholder="Note" class="note">

                                <textarea id="eng-context-area">  
                                </textarea>

                                <select multiple data-role="tagsinput" class="term-input">
                                    <option value="jQuery">jQuery</option>
                                    <option value="Angular">Angular</option>
                                    <option value="React">React</option>
                                    <option value="Vue">Vue</option>
                                </select> 
                                
                            </div>
                            <div class="chinese-context">
                                <h5>China</h5>
                                <div class="first-row">
                                    <input type="text" placeholder="Source">
                                </div>
                                <div class="second-row">
                                    <select id='article-title-chi'>
                                        <option></option>
                                       <option value='1'>收费吓退谷歌地图用户</option>
                                       <option value='2'>转而使用不那么为人所知的服务</option>
                                       <option value='3'>并且这或许与谷歌自身的举动不无关系</option>
                                    </select>
                                </div>
                                <input type="text" placeholder="Note" class="note">

                                <textarea id="chi-context-area"> 
                                </textarea>

                                <select multiple data-role="tagsinput" class="term-input">
                                    <option value="jQuery">jQuery</option>
                                    <option value="Angular">Angular</option>
                                    <option value="React">React</option>
                                    <option value="Vue">Vue</option>
                                </select>
                                
                            </div>
                            <a href="#"><span class="material-icons"> add_box</span> Add One More Term</a>
                            <hr>
                            <div style="width:100%; text-align: center;">
                                <button type="submit">submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      
<?php include 'inc/footer.php';?>
