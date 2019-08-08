import VueRouter from 'vue-router'
// Pages
import Home from './pages/Home'
import Home_Logout from './pages/Home'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'
import AdminUploadBuilding from './pages/admin/Upload_building'
import AdminPortfolioByDesign from './pages/admin/Portfolio_byDesign'
import UserPortfolioByDesign from './pages/user/Portfolio_byDesign'
import PublicUserPortfolioByDesign from './pages/user/Public_Portfolio_byDesign'
import PublicUserPortfolioByDesign_s from './pages/user/Public_Portfolio_byDesign_s'
import Super_adminDashboard from './pages/super_admin/Dashboard'
import InteriorDashboard from './pages/interior/Dashboard'
import InteriorUploadDesign from './pages/interior/Upload_building'
import InteriorPortfolioByDesign from './pages/interior/Portfolio_byDesign'
import ArchitectbuildingDesigns from './pages/admin/Architect_building_designs'
import InteriorbuildingDesigns from './pages/interior/Interior_building_designs'
//PUBLIC
import InteriorResidential from './pages/public/Residential_Interior'
import InteriorCommercial from './pages/public/Commercial_Interior'
import InteriorHospitality from './pages/public/Hospitality_Interior'
import InteriorInstitutional from './pages/public/Institutional_Interior'

import ArchitecturalResidential from './pages/public/Residential_Architecture'
import ArchitecturalCommercial from './pages/public/Commercial_Architecture'
import ArchitecturalHospitality from './pages/public/Hospitality_Architecture'
import ArchitecturalInstitutional from './pages/public/Institutional_Architecture'
import ArchitecturalIndustrial from './pages/public/Industrial_Architecture'

import FurnituresAccessories from './pages/public/Furnitures_Accessories'
import PublicFurnituresAccessories from './pages/public/Public_furnitures_accessories'
//END PUBLIC


//USER
import UserInteriorResidential from './pages/user/interior_designs/Residential_Interior'
import UserInteriorCommercial from './pages/user/interior_designs/Commercial_Interior'
import UserInteriorHospitality from './pages/user/interior_designs/Hospitality_Interior'
import UserInteriorInstitutional from './pages/user/interior_designs/Institutional_Interior'

import UserArchitecturalResidential from './pages/user/architectural_designs/Residential_Architecture'
import UserArchitecturalCommercial from './pages/user/architectural_designs/Commercial_Architecture'
import UserArchitecturalHospitality from './pages/user/architectural_designs/Hospitality_Architecture'
import UserArchitecturalInstitutional from './pages/user/architectural_designs/Institutional_Architecture'
import UserArchitecturalIndustrial from './pages/user/architectural_designs/Industrial_Architecture'

import UserFurnituresAccessories from './pages/user/furnitures&accessories/Furnitures_Accessories'
import UserFurnituresAccessoriesPreview from './pages/user/Preview_furnituresAccessories'
//END USER


import AccountAdmin from './pages/admin/Account.vue'
import ProfileAdmin from './pages/admin/Profile.vue'
import AccountInterior from './pages/interior/Account.vue'
import ProfileInterior from './pages/interior/Profile.vue'

import AccountUser from './pages/user/Account.vue'
import ProfileIndividual from './pages/user/Profile.vue'

import ResidentialSelection from './pages/public/ResidentialSelection'
import CommercialSelection from './pages/public/CommercialSelection'
import HospitalitySelection from './pages/public/HospitalitySelection'
import InstitutionalSelection from './pages/public/InstitutionalSelection'

import UserResidentialSelection from './pages/user/selection/ResidentialSelection.vue'
import UserCommercialSelection from './pages/user/selection/CommercialSelection.vue'
import UserHospitalitySelection from './pages/user/selection/HospitalitySelection.vue'
import UserInstitutionalSelection from './pages/user/selection/InstitutionalSelection.vue'

import PreviewDesignInterior from './pages/interior/Preview_design.vue'
import PreviewDesignArchitect from './pages/admin/Preview_design.vue'
import PreviewDesignSuper_Admin from './pages/super_admin/Preview_design.vue'

import AddDesignerAccount from './pages/super_admin/Add_designer_account.vue'
import ChooseAccount from './pages/account/choose_account.vue'
import DesignerChooseAccount from './pages/account/designer_choose_account.vue'
import AccountNotVerified from './pages/account/account_not_verified.vue'
import AccountSetPassword from './pages/account/account_set_password.vue'

import UploadFurnitureAccessories from './pages/super_admin/Upload_furniture_accessories.vue'

import ListOfFurnituresAccessoriesa from './pages/super_admin/ListOfFurnituresAccessories.vue'
import SuperAdminPortfolioByDesign from './pages/super_admin/Portfolio_byDesign'

import ListOfAllProducts from './pages/super_admin/List_of_all_products.vue'
import ListOfAllDesigns from './pages/super_admin/List_of_all_designs.vue'

import ListOfAllArchitects from './pages/super_admin/table/List_of_all_architects.vue'
import ListOfAllInteriorDesigners from './pages/super_admin/table/List_of_all_interiors.vue'
import ListOfAllIndividuals from './pages/super_admin/table/List_of_all_individuals.vue'



import Preview_building_design from './pages/super_admin/Preview_building_design.vue'


import Contact_us from './pages/public/Contact_us.vue'
import Policies_rules from './pages/public/Policies_rules.vue'
import About_senebu from './pages/public/About_senebu.vue'

import User_Contact_us from './pages/user/footer/Contact_us.vue'
import User_Policies_rules from './pages/user/footer/Policies_rules.vue'
import User_About_senebu from './pages/user/footer/About_senebu.vue'

import page_404_architect from './pages/404/404_individuals.vue'

// Routes
const routes = [
  {
    path: '/404',
    name: 'page_404_architect',
    component: page_404_architect,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: false
    }
  },
  {
    path: '/logout',
    name: 'logout',
    component: Home_Logout,
    meta: {
      auth: false
    }
  },
  {
    path: '/residential/interior_list',
    name: 'residential.interior',
    component: InteriorResidential,
    meta: {
      auth: false
    }
  },
  {
    path: '/commercial/interior_list',
    name: 'commercial.interior',
    component: InteriorCommercial,
    meta: {
      auth: false
    }
  },
  {
    path: '/hospitality/interior_list',
    name: 'hospitality.interior',
    component: InteriorHospitality,
    meta: {
      auth: false
    }
  },
  {
    path: '/institutional/interior_list',
    name: 'institutional.interior',
    component: InteriorInstitutional,
    meta: {
      auth: false
    }
  },
  {
    path: '/residential/architectural_list',
    name: 'residential.architectural',
    component: ArchitecturalResidential,
    meta: {
      auth: false
    }
  },
  {
    path: '/commercial/architectural_list',
    name: 'commercial.architectural',
    component: ArchitecturalCommercial,
    meta: {
      auth: false
    }
  },
  {
    path: '/hospitality/architectural_list',
    name: 'hospitality.architectural',
    component: ArchitecturalHospitality,
    meta: {
      auth: false
    }
  },
  {
    path: '/institutional/architectural_list',
    name: 'institutional.architectural',
    component: ArchitecturalInstitutional,
    meta: {
      auth: false
    }
  },
  {
    path: '/industrial/architectural_list',
    name: 'industrial.architectural',
    component: ArchitecturalIndustrial,
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
    path: '/choose-account',
    name: 'choose_account.page',
    component: ChooseAccount,
    meta: {
      auth: false
    }
  },
  {
    path: '/designer/choose-account',
    name: 'choose_account.designer',
    component: DesignerChooseAccount,
    meta: {
      auth: false
    }
  },
  {
    path: '/account/not-verified',
    name: 'account.not_verified',
    component: AccountNotVerified,
    meta: {
      auth: false
    }
  },
  {
    path: '/account/set-password',
    name: 'account.set-password',
    component: AccountSetPassword,
    meta: {
      auth: false
    }
  },
  {
    path: '/residential/list',
    name: 'residential.selection',
    component: ResidentialSelection,
    meta: {
      auth: false
    }
  },
  {
    path: '/commercial/list',
    name: 'commercial.selection',
    component: CommercialSelection,
    meta: {
      auth: false
    }
  },
  {
    path: '/hospitality/list',
    name: 'hospitality.selection',
    component: HospitalitySelection,
    meta: {
      auth: false
    }
  },
  {
    path: '/institutional/list',
    name: 'institutional.selection',
    component: InstitutionalSelection,
    meta: {
      auth: false
    }
  },
  {
    path: '/furniture-accessories/list',
    name: 'furniture-accessories.selection',
    component: FurnituresAccessories,
    meta: {
      auth: false
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
    path: '/by_design/portfolio-details/:portfolio_id',
    name: 'public_user.portfolio_byDesign_s',
    component: PublicUserPortfolioByDesign_s,
    meta: {
      auth: false
    }
  },
  {
    path: '/preview/furniture-accessories/:portfolio_id',
    name: 'furniture-accessories.preview',
    component: PublicFurnituresAccessories,
    meta: {
      auth: false
    }
  },
  {
    path: '/contact-us',
    name: 'contact-us',
    component: Contact_us,
    meta: {
      auth: false
    }
  },
  {
    path: '/policies-rules',
    name: 'policies-rules',
    component: Policies_rules,
    meta: {
      auth: false
    }
  },
  {
    path: '/about-us',
    name: 'about-us',
    component: About_senebu,
    meta: {
      auth: false
    }
  },

  // USER ROUTES

  {
    path: '/residential/architectural-list',
    name: 'user_residential.architectural',
    component: UserArchitecturalResidential,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/commercial/architectural-list',
    name: 'user_commercial.architectural',
    component: UserArchitecturalCommercial,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/hospitality/architectural-list',
    name: 'user_hospitality.architectural',
    component: UserArchitecturalHospitality,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/institutional/architectural-list',
    name: 'user_institutional.architectural',
    component: UserArchitecturalInstitutional,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/industrial/architectural-list',
    name: 'user_industrial.architectural',
    component: UserArchitecturalIndustrial,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/residential/interior-list',
    name: 'user_residential.interior',
    component: UserInteriorResidential,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/commercial/interior-list',
    name: 'user_commercial.interior',
    component: UserInteriorCommercial,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/hospitality/interior-list',
    name: 'user_hospitality.interior',
    component: UserInteriorHospitality,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/institutional/interior-list',
    name: 'user_institutional.interior',
    component: UserInteriorInstitutional,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/residential-list',
    name: 'user_residential.selection',
    component: UserResidentialSelection,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/commercial-list',
    name: 'user_commercial.selection',
    component: UserCommercialSelection,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/hospitality-list',
    name: 'user_hospitality.selection',
    component: UserHospitalitySelection,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/institutional-list',
    name: 'user_institutional.selection',
    component: UserInstitutionalSelection,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/individuals',
    name: 'user.dashboard',
    component: Dashboard,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },

  {
    path: '/by_design/portfolio-details/:portfolio_id',
    name: 'user.portfolio_byDesign',
    component: UserPortfolioByDesign,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/user/account',
    name: 'user.account',
    component: AccountUser,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/user/profile',
    name: 'user.profile',
    component: ProfileIndividual,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/furniture-accessories-list',
    name: 'user.furniture_accessories_list_selection',
    component: UserFurnituresAccessories,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/preview-furniture-accessories/:portfolio_id',
    name: 'user_furniture-accessories.preview', 
    component: UserFurnituresAccessoriesPreview,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/contact_us',
    name: 'contact_us',
    component: User_Contact_us,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/policies_rules',
    name: 'policies_rules',
    component: User_Policies_rules,
    meta: {
        auth: {roles: 1}
    }
  },
  {
    path: '/about_us',
    name: 'about_us',
    component: User_About_senebu,
    meta: {
        auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
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
  {
    path: '/architect/building-designs/',
    name: 'admin.building_designs',
    component: ArchitectbuildingDesigns,
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
  {
    path: '/interior/building-designs/',
    name: 'interior.building_designs',
    component: InteriorbuildingDesigns,
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
  },
  {
    path: '/add_designer-account',
    name: 'add_designer.dashboard',
    component: AddDesignerAccount,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/upload-furniture-accessories',
    name: 'furniture-accessories.dashboard',
    component: UploadFurnitureAccessories,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/list-furnituresAccessories',
    name: 'list-furniture&accessories',
    component: ListOfFurnituresAccessoriesa,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/super_admin/preview_furnituresAccessories/:portfolio_id',
    name: 'super_admin.preview_furnituresAccessories',
    component: PreviewDesignSuper_Admin,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/super_admin/by_design/edit/:portfolio_id',
    name: 'super_admin.edit_furnituresAccessories',
    component: SuperAdminPortfolioByDesign,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/list-all/products',
    name: 'super_admin.all_products',
    component: ListOfAllProducts,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/list-all/designs',
    name: 'super_admin.all_designs',
    component: ListOfAllDesigns,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/preview/building-designs',
    name: 'super_admin.preview_building_designs',
    component: Preview_building_design,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/list/architects',
    name: 'super_admin.list-architects',
    component: ListOfAllArchitects,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/list/interior-designers',
    name: 'super_admin.list-interiors',
    component: ListOfAllInteriorDesigners,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/list/individuals',
    name: 'super_admin.list-individuals',
    component: ListOfAllIndividuals,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },

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