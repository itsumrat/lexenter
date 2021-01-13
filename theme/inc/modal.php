<!-- Context Information Modal -->
<div class="modal fade" id="context-info-modal" tabindex="-1" role="dialog" aria-labelledby="context-info-modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="context-info-modalTitle">Context Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="eng-context-info">
                                <h5>English</h5>
                                <span>Article ID: 1000000</span><br>
                                <span>Context ID: 25658512</span><br>
                                <span>Context Order: 4</span><br>
                                <span>Term: adsfkl, adfasdf, asdfas</span><br>
                                <span>Note: sadfas fsadf sadf sadf asdf asdfas fd.</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="chi-context-info">
                                <h5>Chinese</h5>
                                <span>Article ID: 1000000</span><br>
                                <span>Context ID: 25658512</span><br>
                                <span>Context Order: 4</span><br>
                                <span>Term: adsfkl, adfasdf, asdfas</span><br>
                                <span>Note: sadfas fsadf sadf sadf asdf asdfas fd.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Term Addition Modal -->
<div class="modal fade" id="add-term-modal" tabindex="-1" role="dialog" aria-labelledby="add-term-modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-term-modalTitle">Context Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>English</h5>
                            <form class="term-add">
                                <textarea id="eng-context-area">
                                    Facing Fees, Some Sites Are Bypassing Google Maps  
                                </textarea>
                                <select multiple data-role="tagsinput" class="term-input">
                                    <option value="jQuery">jQuery</option>
                                    <option value="Angular">Angular</option>
                                    <option value="React">React</option>
                                    <option value="Vue">Vue</option>
                                </select>
                                <button type="submit">Add Terms</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h5>Chinese</h5>
                            <form class="term-add">
                                <textarea id="chi-context-area"> 
                                    收费吓退谷歌地图用户
                                </textarea>
                                <select multiple data-role="tagsinput" class="term-input">
                                    <option value="jQuery">jQuery</option>
                                    <option value="Angular">Angular</option>
                                    <option value="React">React</option>
                                    <option value="Vue">Vue</option>
                                </select>
                                <button type="submit">Add Terms</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>