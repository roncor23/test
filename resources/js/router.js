import VueRouter from 'vue-router'
// Pages
import Home from './pages/Home'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'
import AdminUploadBuilding from './pages/admin/Upload_building'
import AdminPortfolioByDesign from './pages/admin/Portfolio_byDesign'
import UserPortfolioByDesign from './pages/user/Portfolio_byDesign'
import PublicUserPortfolioByDesign from './pages/user/Public_Portfolio_byDesign'
import Checkout_reserved_design from './pages/user/Checkout'
import Super_adminDashboard from './pages/super_admin/Dashboard'
import Noti_Text_Reserved from './pages/user/notification/Noti__text_Reserved'
import InteriorDashboard from './pages/interior/Dashboard'
import InteriorUploadDesign from './pages/interior/Upload_building'
import InteriorPortfolioByDesign from './pages/interior/Portfolio_byDesign'
import ResidentialHouses from './pages/public/Residential'
import CommercialHouses from './pages/public/Commercial'
import InteriorDesign from './pages/public/Interior'
import UserResidential from './pages/user/designs/Residential'
import UserCommercial from './pages/user/designs/Commercial'
import UserInterior from './pages/user/designs/Interior'

// Routes
const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: false
    }
  },
  {
    path: '/residential_designs',
    name: 'public_residential',
    component: ResidentialHouses,
    meta: {
      auth: false
    }
  },
  {
    path: '/commercial_designs',
    name: 'public_commercial',
    component: CommercialHouses,
    meta: {
      auth: false
    }
  },
    {
    path: '/interior_designs',
    name: 'public_interior',
    component: InteriorDesign,
    meta: {
      auth: false
    }
  },
  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: {
      auth: false
    }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      auth: false
    }
  },

  // USER ROUTES
  {
    path: '/user_dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/residential-designs',
    name: 'user_residential',
    component: UserResidential,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
    {
    path: '/commercial-designs',
    name: 'user_commercial',
    component: UserCommercial,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
    {
    path: '/interior-designs',
    name: 'user_interior',
    component: UserInterior,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/by_design/portfolio_details/:portfolio_id',
    name: 'user.portfolio_byDesign',
    component: UserPortfolioByDesign,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/by_design/portfolio_details/:portfolio_id',
    name: 'public_user.portfolio_byDesign',
    component: PublicUserPortfolioByDesign,
    meta: {
      auth: false
    }
  },
  {
    path: '/checkout/:portfolio_id',
    name: 'checkout',
    component: Checkout_reserved_design,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/reservation/',
    name: 'text_reservation',
    component: Noti_Text_Reserved,
    meta: {
      auth: {roles: 1, forbiddenRedirect: '/403'}
    }
  },
  // ADMIN ROUTES
  {
    path: '/architect',
    name: 'admin.dashboard',
    component: AdminDashboard,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/architect/upload_building',
    name: 'admin.upload_building',
    component: AdminUploadBuilding,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/architect/by_design/edit/:portfolio_id',
    name: 'admin.portfolio_byDesign',
    component: AdminPortfolioByDesign,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
    // INTERIOR ROUTES
  {
    path: '/interior',
    name: 'interior.dashboard',
    component: InteriorDashboard,
    meta: {
      auth: {roles: 4, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/interior/upload_building',
    name: 'interior.upload_building',
    component: InteriorUploadDesign,
    meta: {
      auth: {roles: 4, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
    {
    path: '/interior/by_design/edit/:portfolio_id',
    name: 'interior.portfolio_byDesign',
    component: InteriorPortfolioByDesign,
    meta: {
      auth: {roles: 4, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  // SUPER ADMIN
  {
    path: '/super_admin',
    name: 'super_admin.dashboard',
    component: Super_adminDashboard,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  }
]
const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})
export default router