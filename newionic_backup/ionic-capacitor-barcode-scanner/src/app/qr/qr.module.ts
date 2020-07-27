import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { QrPageRoutingModule } from './qr-routing.module';

import { QrPage } from './qr.page';
import { BarcodeScanner } from '@ionic-native/barcode-scanner/ngx';
import { DetailsComponent } from './details/details.component';

@NgModule({
  providers:[
    BarcodeScanner
  ],
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    QrPageRoutingModule
  ],
  declarations: [QrPage,DetailsComponent]
})
export class QrPageModule {}
