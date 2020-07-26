import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ProductService {
  public dev='http://mini-market.test/api';
  public prod='https://acvillazon-market.000webhostapp.com/API/api';
  
  constructor(public http:HttpClient) {}

  getProducts(){
    // return this.http.get('http://mini-market.test/api/getProducts');
    return this.http.get(`${this.prod}/getProducts`);
  }
  
  getProduct(id:Number){
    // return this.http.get(`http://mini-market.test/api/getProduct/${id}`);
    return this.http.get(`${this.prod}/getProduct/${id}`);
  }
  
  getTypes(){
    // return this.http.get(`http://mini-market.test/api/getTypes`);
    return this.http.get(`${this.prod}/getTypes`);
  }
 
  update(product:any){

    const headers = new HttpHeaders();
    let product_ = new FormData();
    product_.set('product',JSON.stringify(product));
    // return this.http.post(`http://mini-market.test/api/update_api`,product_,{headers});;
    return this.http.post(`${this.prod}/update_api`,product_,{headers});;
  }
  
  create(product:any){

    const headers = new HttpHeaders();
    let product_ = new FormData();
    product_.set('product',JSON.stringify(product));
    // return this.http.post(`http://mini-market.test/api/create_api`,product_,{headers});;
    return this.http.post(`${this.prod}/create_api`,product_,{headers});;
  }
}
