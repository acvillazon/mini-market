import { Component, OnInit } from '@angular/core';
import { BarcodeScanner } from '@ionic-native/barcode-scanner/ngx';
import { Router } from '@angular/router';
import { ProductService } from '../services/product.service';
import { ToastController } from '@ionic/angular';

@Component({
  selector: 'app-qr',
  templateUrl: './qr.page.html',
  styleUrls: ['./qr.page.scss'],
})
export class QrPage implements OnInit {

  data: any;
  products:any[];

  constructor(private barcodeScanner: BarcodeScanner,
              private route:Router,
              public toastController: ToastController,
              private product_service:ProductService) {}

  ngOnInit(){
    this.loadProducts();
  }

  loadProducts=()=>{
    this.product_service.getProducts().subscribe(data =>{
      this.products=data['products'];
    });
  }

  scan() {
    this.data = null;
    this.barcodeScanner.scan().then(barcodeData => {
      // console.log('Barcode data', barcodeData);
      this.data = barcodeData;

      let product = this.products.filter(value =>{
        return Number(value.id_product) == Number(barcodeData.text)
      })[0];

      if(product){
        this.route.navigateByUrl(`/tabs/qr/details/${barcodeData.text}`)
      }else{

        if(!barcodeData.text){
          return this.presentToast(`Incorrect format (format available:text)`,2000,false);

        }

        this.presentToast(`The ID ${barcodeData.text} was not found`,2000,false);
      }

    }).catch(err => {
      this.presentToast("Something was wrong!",2000,false);
    });
  }

  async presentToast(message,duration:number,header) {
    const toast = await this.toastController.create({
      header: header?'Sucessfully':'Failed',
      message,
      position: 'top',
      duration
    });
    toast.present();
  }

}
