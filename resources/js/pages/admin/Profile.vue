<template>
	  <div class="container card mb-5" style="margin-top: 100px">
        <div class="row my-2">
            <div class="col-lg-12 order-lg-2 mt-3">
                <ul class="nav nav-tabs">
                     <li class="nav-item">
                        <a href="" data-target="#1tab" data-toggle="tab" class="nav-link active">Personal Information</a>
                    </li>
                </ul>
                    <div class="tab-pane active" id="1tab">
                        <div class="row mt-3">

                            <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                <h4>Contact Information</h4>
                                <small>Your contact information is strictly private, visible to you and the admins. </small>
                                <hr>
                                <div class="mt-2">
                                    <small>Choose profile pic.</small><br>
                                    <small>Size of the image should be max <b>900kb.</b></small> <br>

                                    <div class="cb_img_profile">                                   
                                        <img class="card_id">                               
                                    </div>

                                    <label class="btn btn-primary btn-sm mt-2" for="idfront">
                                        <input id="idfront" type="file" ref="file1" name="front" @change="" style="display:none">
                                        Change profile pic
                                    </label>
                                    <small class='label label-info' id="uploadfront"></small>
                                </div>                               
                            </div>
                            <div class="col-lg-9 col-md-6 col-sm-12">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Full name</label>
                                            <input type="text" name="fullname"  class="form-control" >
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Phone</label>
                                            <input type="text" name="phone"  class="form-control" >
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row end.// -->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Address</label>
                                            <input type="text" name="address1"  class="form-control">
                                        </div> <!-- form-group end.// -->
                                        <div class="col form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>Address line 2</label>
                                            <input type="text" name="address2"  class="form-control">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>City / Town</label>
                                        <input type="text" name="city" class="form-control" >
                                        </div> <!-- form-group end.// -->
                                        <div class="col form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                            <label>State / Country / Province</label>
                                            <input type="text" name="province"  class="form-control" >
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->

                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Postcode / ZIP</label>
                                        <input type="text" name="postcode" class="form-control">
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Country</label>
                                        <select class="form-control" name="country" >
                                            <option value="" selected disabled hidden></option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Russia">Russia</option>
                                            <option value="States">United States</option>
                                            <option value="India">India</option>
                                            <option value="Afganistan">Afganistan</option>
                                        </select>
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// -->

                                    <div class="form-row">

                                        <div class="form-group col-sm-12 col-md-12 col-lg-5 mr-2">
                                        <label>Birthday</label>
                                            <input type="text" name="birthday"  class="form-control">
                                        </div> <!-- form-group end.// -->
                                    </div> <!-- form-row.// --> 
                                </form>
                                <p class="btn btn-primary mt-1" @click="" style="color:#fff">Update Info</p>
                            </div>

                        </div>
                    </div><!-- 1st tab -->
      
            </div>         
        </div>
    </div>
</template>