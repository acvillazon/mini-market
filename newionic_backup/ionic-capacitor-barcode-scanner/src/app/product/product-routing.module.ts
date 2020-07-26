import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ProductPage } from './product.page';
import { UpdateComponent } from './update/update.component';
import { CreateComponent } from './create/create.component';

const routes: Routes = [
  {
    path: '',
    component: ProductPage,
  },
  {
    path: 'update/:id',
    component: UpdateComponent,
  },
  {
    path: 'create',
    component: CreateComponent,
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ProductPageRoutingModule {}
