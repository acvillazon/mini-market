import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { QrPageRoutingModule } from './qr-routing.module';

import { QrPage } from './qr.page';
import { BarcodeScanner } from '@ionic-native/barcode-scanner/ngx';

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
  declarations: [QrPage]
})
export class QrPageModule {}
