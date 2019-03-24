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


//PUBLIC
import InteriorResidential from './pages/public/Residential_Interior'
import InteriorCommercial from './pages/public/Commercial_Interior'
import InteriorHospitality from './pages/public/Hospitality_Interior'

import ArchitecturalResidential from './pages/public/Residential_Architecture'
import ArchitecturalCommercial from './pages/public/Commercial_Architecture'
import ArchitecturalHospitality from './pages/public/Hospitality_Architecture'

//USER
import UserInteriorResidential from './pages/user/interior_designs/Residential_Interior'
import UserInteriorCommercial from './pages/user/interior_designs/Commercial_Interior'
import UserInteriorHospitality from './pages/user/interior_designs/Hospitality_Interior'

import UserArchitecturalResidential from './pages/user/architectural_designs/Residential_Architecture'
import UserArchitecturalCommercial from './pages/user/architectural_designs/Commercial_Architecture'
import UserArchitecturalHospitality from './pages/user/architectural_designs/Hospitality_Architecture'



import AccountAdmin from './pages/admin/Account.vue'
import ProfileAdmin from './pages/admin/Profile.vue'
import AccountInterior from './pages/interior/Account.vue'
import ProfileInterior from './pages/interior/Profile.vue'


import ResidentialSelection from './pages/public/ResidentialSelection'
import CommercialSelection from './pages/public/CommercialSelection'
import HospitalitySelection from './pages/public/HospitalitySelection'

import UserResidentialSelection from './pages/user/selection/ResidentialSelection.vue'
import UserCommercialSelection from './pages/user/selection/CommercialSelection.vue'
import UserHospitalitySelection from './pages/user/selection/HospitalitySelection.vue'

import PreviewDesignInterior from './pages/interior/Preview_design.vue'
import PreviewDesignArchitect from './pages/admin/Preview_design.vue'

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
    path: '/residential/interior',
    name: 'residential.interior',
    component: InteriorResidential,
    meta: {
      auth: false
    }
  },
  {
    path: '/commercial/interior',
    name: 'commercial.interior',
    component: InteriorCommercial,
    meta: {
      auth: false
    }
  },
  {
    path: '/hospitality/interior',
    name: 'hospitality.interior',
    component: InteriorHospitality,
    meta: {
      auth: false
    }
  },
  {
    path: '/residential/architectural',
    name: 'residential.architectural',
    component: ArchitecturalResidential,
    meta: {
      auth: false
    }
  },
  {
    path: '/commercial/architectural',
    name: 'commercial.architectural',
    component: ArchitecturalCommercial,
    meta: {
      auth: false
    }
  },
    {
    path: '/hospitality/architectural',
    name: 'hospitality.architectural',
    component: ArchitecturalHospitality,
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
  {
    path: '/residential/selection',
    name: 'residential.selection',
    component: ResidentialSelection,
    meta: {
      auth: false
    }
  },
  {
    path: '/commercial/selection',
    name: 'commercial.selection',
    component: CommercialSelection,
    meta: {
      auth: false
    }
  },
  {
    path: '/hospitality/selection',
    name: 'hospitality.selection',
    component: HospitalitySelection,
    meta: {
      auth: false
    }
  },

  // USER ROUTES
  {
    path: '/residential/architectural',
    name: 'user_residential.architectural',
    component: UserArchitecturalResidential,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/commercial/architectural',
    name: 'user_commercial.architectural',
    component: UserArchitecturalCommercial,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/hospitality/architectural',
    name: 'user_hospitality.architectural',
    component: UserArchitecturalHospitality,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/residential/interior',
    name: 'user_residential.interior',
    component: UserInteriorResidential,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/commercial/interior',
    name: 'user_commercial.interior',
    component: UserInteriorCommercial,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/hospitality/interior',
    name: 'user_hospitality.interior',
    component: UserInteriorHospitality,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/residential/selection',
    name: 'user_residential.selection',
    component: UserResidentialSelection,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/commercial/selection',
    name: 'user_commercial.selection',
    component: UserCommercialSelection,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/hospitality/selection',
    name: 'user_hospitality.selection',
    component: UserHospitalitySelection,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/user_dashboard',
    name: 'dashboard',
    component: Dashboard,
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
    name: 'admin_edit.portfolio_byDesign',
    component: AdminPortfolioByDesign,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/architect/account',
    name: 'admin.account',
    component: AccountAdmin,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/architect/profile',
    name: 'admin.profile',
    component: ProfileAdmin,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/architect/preview_design/:portfolio_id',
    name: 'admin.preview_design',
    component: PreviewDesignArchitect,
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
    name: 'interior_edit.portfolio_byDesign',
    component: InteriorPortfolioByDesign,
    meta: {
      auth: {roles: 4, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/interior/account',
    name: 'interior.account',
    component: AccountInterior,
    meta: {
      auth: {roles: 4, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/interior/profile',
    name: 'interior.profile',
    component: ProfileInterior,
    meta: {
      auth: {roles: 4, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/interior/preview_design/:portfolio_id',
    name: 'interior.preview_design',
    component: PreviewDesignInterior,
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

  scrollBehavior (to, from, savedPosition) {
  return { x: 0, y: 0 }
  }
})
export default router