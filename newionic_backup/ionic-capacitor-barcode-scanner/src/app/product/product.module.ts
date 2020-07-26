import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ProductPageRoutingModule } from './product-routing.module';

import { ProductPage } from './product.page';
import { CreateComponent } from './create/create.component';
import { UpdateComponent } from './update/update.component';

@NgModule({
  imports: [
    CommonModule,
    IonicModule,
    ProductPageRoutingModule,
    FormsModule,
    ReactiveFormsModule
  ],
  declarations: [ProductPage, CreateComponent, UpdateComponent]
})
export class ProductPageModule {}
