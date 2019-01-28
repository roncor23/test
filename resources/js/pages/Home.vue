<template>
<!--     <div class="container mt-3">
        <div class="card card-default">
            <div class="card-header">Bienvenue</div>
            <div class="card-body">
                <p>
                    American  Main Barbary Coast scuttle hardtack spanker fire ship grapple jack code  of conduct port. Port red ensign Shiver me timbers provost salmagundi  bring a spring upon her cable pillage cog crow's nest lateen sail.  Barbary Coast quarterdeck lass coffer keel hulk mizzen me square-rigged  loot.
                </p>
                <p>
                    Yardarm starboard keelhaul list schooner prow booty cackle  fruit gabion topmast. Plunder shrouds Nelsons folly jack Arr parley warp  grog blossom ballast pressgang. Knave crack Jennys tea cup flogging log  man-of-war hearties killick long clothes six pounders hulk.
                </p>
            </div>
        </div>
    </div> -->
    <div>
      <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
        <img class="w3-image" :src="header_img" alt="Architecture" width="1500" height="800">
        <div class="w3-display-middle w3-margin-top w3-center">
          <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>CR</b></span> <span class="w3-hide-small w3-text-light-grey">Designs</span></h1>
        </div>
      </header>

       <!-- BUILDING DESIGNS AREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
      <hr id="building" class="hr-text mt-5" data-content="Building Designs">

    </div>

   



</template>

<script>
  export default {
    data() {
      return {

        header_img: 'image/architectural-design.jpg'
      }
    },
    mounted() {
      //
    }
  }
</script>

<style>
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


/*Header*/
.w3-content {
    max-width: 980px;
}
.w3-content, .w3-auto {
    margin-left: auto;
    margin-right: auto;
}
.w3-tooltip, .w3-display-container {
    position: relative;
}
.w3-wide {
    letter-spacing: 4px;
}
.w3-image {
    max-width: 100%;
    height: auto;
}
img {
    vertical-align: middle;
}
img {
    border-style: none;
}
.w3-margin-top {
    margin-top: 16px!important;
}
.w3-center {
    text-align: center!important;
}
.w3-display-middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
}
.w3-black, .w3-hover-black:hover {
    color: #fff!important;
    background-color: #000!important;
}
.w3-padding {
    padding: 8px 16px!important;
}
.w3-opacity-min {
    opacity: 0.75;
}

</style>