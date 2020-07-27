import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { QrPage } from './qr.page';
import { DetailsComponent } from './details/details.component';
import { UpdateComponent } from '../product/update/update.component';

const routes: Routes = [
  {
    path: '',
    component: QrPage
  },
  {
    path: 'details/:id',
    component: DetailsComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class QrPageRoutingModule {}
