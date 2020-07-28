import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ProductService {
  public dev='http://mini-market.test/api';
  
  constructor(public http:HttpClient) {}

  getProducts(){
    return this.http.get(`${environment.API}/getProducts`);
  }
  
  getProduct(id:Number){
    return this.http.get(`${environment.API}/getProduct/${id}`);
  }
  
  getTypes(){
    return this.http.get(`${environment.API}/getTypes`);
  }
 
  update(product:any){
    let product_ = new FormData();
    product_.set('product',JSON.stringify(product));
    return this.http.post(`${environment.API}/update_api`,product_);
  }
  
  create(product:any){
    let product_ = new FormData();
    product_.set('product',JSON.stringify(product));
    return this.http.post(`${environment.API}/create_api`,product_,);
  }
}
