<template>
	  <div class="container card mb-5" style="margin-top: 100px">
        <div class="row my-2">
            <div class="col-lg-12 order-lg-2 mt-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-toggle="tab" class="nav-link active">Email and Password</a>
                    </li>
                </ul>

                <div class="row mt-3">
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                        <h4>Email</h4>                         
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                        <form>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->

                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Enter your password to confirm change</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            
                            <a href="" class="btn btn-primary mt-1">Change email address</a>
                        </form>
                    </div>
                </div>  
                <div class="row mt-5">
	                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
	                    <h4>Password</h4>
	                    <small>
	                        <span class="help-block">Tips for a secure password</span>
	                        <ul class="list-bullet">
	                            <li>Use a mix of letters, numbers and symbols</li>
	                            <li>Don't use personal information or common words</li>
	                            <li>Make it long - the longer the better. We require a minimum of 12 characters</li>
	                        </ul>
	                    </small>	                    
	                </div>
	                <div class="col-lg-6 col-md-6 col-sm-12">
	                    <form>
	                        <div class="form-row">
	                            <div class="col form-group">
	                                <label>Current password</label>
	                                <input type="text" class="form-control" placeholder="">
	                            </div> <!-- form-group end.// -->
	                        </div> <!-- form-row end.// -->

	                        <div class="form-row">
	                            <div class="col form-group">
	                                <label>New password</label>
	                                <input type="password" class="form-control" placeholder="">
	                            </div> <!-- form-group end.// -->
	                        </div> <!-- form-row end.// -->

	                        <div class="form-row">
	                            <div class="col form-group">
	                                <label>Confirm new password</label>
	                                <input type="password" class="form-control" placeholder="">
	                            </div> <!-- form-group end.// -->
	                        </div> <!-- form-row end.// -->
	                        
	                        <a href="" class="btn btn-primary mt-1">Change password</a><br>
	                        <a href="#"><small>I forgot my password</small></a>
	                    </form>
	                </div>
                </div>        
            </div>         
        </div>
    </div>
</template>