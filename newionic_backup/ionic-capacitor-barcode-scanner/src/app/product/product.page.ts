import { Component, OnInit, OnDestroy } from '@angular/core';
import { ProductService } from '../services/product.service';

interface Product{
  id_product:Number
  name_product:String
  type_id:Number
  price:Number
  quantity:Number
  historical:Number
}

@Component({
  selector: 'app-product',
  templateUrl: './product.page.html',
  styleUrls: ['./product.page.scss'],
})
export class ProductPage implements OnInit, OnDestroy {

  public products:Product[];
  public unscribeProduct:any;

  constructor(private product_service:ProductService) {
    
  }

  ngOnDestroy(): void {
    this.unscribeProduct.unscribeProduct();
  }

  ngOnInit() {
    this.loadProducts();
  }

  loadProducts(){
    this.unscribeProduct = this.product_service.getProducts().subscribe((data:any) =>{
      this.products=data.products;
    });
  }
}
