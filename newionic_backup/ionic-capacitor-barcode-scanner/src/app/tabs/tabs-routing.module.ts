import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { TabsPage } from './tabs.page';

const routes: Routes = [
  {
    path: 'tabs',
    component: TabsPage,
    children:[
      {
        path: 'product',
        loadChildren: () => import('../product/product.module').then( m => m.ProductPageModule)
      },
      {
        path: 'qr',
        loadChildren: () => import('../qr/qr.module').then( m => m.QrPageModule)
      },
    ]
  },
  {
    path:'',
    redirectTo:'tabs/product', 
    pathMatch:'full,'
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class TabsPageRoutingModule {}
