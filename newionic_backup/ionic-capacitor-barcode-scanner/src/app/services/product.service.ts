import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ProductService {
  constructor(public http:HttpClient) {}

  getProducts(){
    return this.http.get('http://mini-market.test/api/getProducts');
  }
  
  getProduct(id:Number){
    return this.http.get(`http://mini-market.test/api/getProduct/${id}`);
  }
  
  getTypes(){
    return this.http.get(`http://mini-market.test/api/getTypes`);
  }
 
  update(product:any){

    const headers = new HttpHeaders();
    let product_ = new FormData();
    product_.set('product',JSON.stringify(product));
    return this.http.post(`http://mini-market.test/api/update_api`,product_,{headers});;
  }
  
  create(product:any){

    const headers = new HttpHeaders();
    let product_ = new FormData();
    product_.set('product',JSON.stringify(product));
    return this.http.post(`http://mini-market.test/api/create_api`,product_,{headers});;
  }
}
