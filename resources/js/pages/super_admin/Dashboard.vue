<template>
     <div class="container" style="margin-top:100px;">
       <hr id="building" class="hr-text" data-content="Admin Dashboard" style="">
     
            

          <div class="row">

              <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="list-group">
                  <a class="list-group-item"  @click="" style="cursor: pointer">Reserved designs</a>
                  <a class="list-group-item" @click="" style="cursor: pointer">List of architects</a>
                  <a class="list-group-item" @click="" style="cursor: pointer">List of interior designer</a>
                  <a class="list-group-item" style="cursor: pointer">List of individuals</a>
                  <a class="list-group-item" style="cursor: pointer">Building designs</a>
                </div>

                <div class="list-group mt-3">
                  <a  class="list-group-item">Settings</a>
                </div>      
             </div>
           </div>


           
      </div>
      
</template>
<style scoped>

div a:hover {
  background-color: #ddd;
}

  /* hr center text */
.hr-text {
  line-height: 1em;
  position: relative;
  outline: 0;
  border: 0;
  color: black;
  text-align: center;
  height: 1.5em;
  opacity: .5;
  font-size:2rem;
  
}
.hr-text:before {
  content: '';
  background: linear-gradient(to right, transparent, #818078, transparent);
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  height: 1px;
}
.hr-text:after {
  content: attr(data-content);
  position: relative;
  display: inline-block;
  color: black;
  padding: 0 .5em;
  line-height: 1.5em;
  color: #818078;
  background-color: #F5F8FA;
}
</style>
