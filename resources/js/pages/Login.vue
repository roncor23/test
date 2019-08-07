<template>
  <div class="container">
      <div class="justify-content-center align-items-center row">
        <a href="/"><img class="w3-bar-item ml-4" :src="logo" id="logo"></a>
      </div>       
     <div class="justify-content-center align-items-center row" style="margin-top:20px">
        <h1 style="font-size:24px;  letter-spacing: -.5px; color:#696969; margin-top:0;font-weight:100">Login to Senebu</h1>
        <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center align-items-center row" style="margin-top:5px;margin-bottom:100px">
            <div class="card card-default col-lg-3 col-md-3 col-sm-3">
                <div class="card-body"  style="padding:20px">
                    <div class="alert alert-danger" v-if="has_error">
                        <p>Error, username or password.</p>
                    </div>
                    <form autocomplete="off" @submit.prevent="login" method="post">
                        <div class="form-group">
                            <label for="email" style="font-weight:bold">E-mail</label>
                            <input type="email" id="email" class="form-control"  v-model="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" style="font-weight:bold">Password</label><span style="font-size:9pt;float:right; cursor:pointer"><a href="">Forgot password?</a></span>
                            <input type="password" id="password" class="form-control"  v-model="password" required>
                        </div>
                        <button type="submit" class="btn " style="background-color:#6495ED; color:#fff">Login</button>
                    </form><br>
                     <span>Not a member yet? <a href="/register">Register</a></span>
                </div>

            </div>

        </div>
      </div>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        email: null,
        password: null,
        has_error: false,
        logo: 'image/logo2_re.png',
      }
    },
    mounted() {
      //
    },
    methods: {
      login() {
        // get the redirect object
        var redirect = this.$auth.redirect()
        var app = this
        this.$auth.login({
          params: {
            email: app.email,
            password: app.password
          },
          success: function() {
            // handle redirection
            const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 2 ? 'admin.dashboard' : this.$auth.user().role === 3 ? 'super_admin.dashboard' : this.$auth.user().role === 4 ? 'interior.dashboard'  : 'user.dashboard'
            this.$router.push({name: redirectTo})
          },
          error: function() {
            app.has_error = true
          },
          rememberMe: true,
          fetchUser: true
        })
      }
    }
  }
</script>

<style>


</style>