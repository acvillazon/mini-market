import { Component, OnInit } from '@angular/core';
import { ProductService } from '../../services/product.service';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastController } from '@ionic/angular';
import { NgForm } from '@angular/forms';

interface Product{
  id_product:Number
  name_product:String
  type_id:Number
  price:Number
  quantity:Number
  historical:Number
}

@Component({
  selector: 'app-update',
  templateUrl: './update.component.html',
  styleUrls: ['./update.component.scss'],
})
export class UpdateComponent implements OnInit {


  public product_id:any;
  public product:Product;
  public current:Number;

  public types:any[];

  constructor(private product_service:ProductService,
              private routerActivated:ActivatedRoute,
              public toastController: ToastController,
              public router:Router          
    ) 
  {
      routerActivated.paramMap.subscribe(data =>{
        if(data.has('id')){
          this.product_id=data.get('id');
          this.getTypes();
          this.loadProduct();
        }
      })
  }

  ngOnInit() {}

  loadProduct(){
    this.product_service.getProduct(this.product_id).subscribe(product =>{
      this.product=product['product'];
      this.current=product['product'].quantity;
    });
  }
  
  getTypes(){
    this.product_service.getTypes().subscribe(types =>{
      this.types=types['types'];
    });
  }

  updateProduct(form:NgForm,quantity:any){
    if(form.invalid){
      Object.values(form.controls).forEach(data =>{
        data.markAsTouched();
      }); return;
    }

    this.product.quantity=Number(quantity);
    this.product_service.update(this.product).subscribe(result =>{
      if(result['types']){
        this.presentToast('The product has been updated',2000);
      }
    },(err) =>{
      this.presentToast('The product has not been updated',2000,false);
    });
  }

  async presentToast(message,duration:any,header=true) {
    const toast = await this.toastController.create({
      header: header?'Sucessfully':'Failed',
      message,
      position: 'top',
      duration:Number(duration)
    });
    toast.present();

    toast.onDidDismiss().then(data =>{
      this.router.navigate(['/'])
    })
  }

}
