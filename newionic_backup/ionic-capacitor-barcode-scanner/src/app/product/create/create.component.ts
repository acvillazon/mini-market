import { Component, OnInit } from '@angular/core';
import { ProductService } from '../../services/product.service';
import { Router } from '@angular/router';
import { ToastController } from '@ionic/angular';
import { NgForm } from '@angular/forms';
import { Product } from 'src/app/models/product';

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.scss'],
})
export class CreateComponent implements OnInit {

  public product:Product={
    name_product:'',
    price:null,
    quantity:null,
    type_id:null,
    historical:null,
    id_product:null
  }
  
  public types:any=[];

  constructor(private product_service:ProductService, 
      public toastController: ToastController,
      public router:Router
      ) {
    this.getTypes();
  }

  ngOnInit() {}

  getTypes(){
    this.product_service.getTypes().subscribe(types =>{
      this.types=types['types'];
    });
  }

  createProduct(form:NgForm){
    if(form.invalid){
      Object.values(form.controls).forEach(data =>{
        data.markAsTouched();
      }); return;
    }

    this.product_service.create(form.value).subscribe(result =>{
      if(result['types']){
        this.presentToast('The product has been created',2000,true);
      }
    },err=>{
      this.presentToast('The product has not been created',2000,false);
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

    toast.onDidDismiss().then(data =>{
      this.router.navigate(['/'])
    })
  }

}
