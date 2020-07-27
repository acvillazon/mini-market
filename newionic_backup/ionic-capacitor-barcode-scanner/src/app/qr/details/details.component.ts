import { Component, OnInit } from '@angular/core';
import { ProductService } from 'src/app/services/product.service';
import { Router, ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-details',
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.scss'],
})
export class DetailsComponent implements OnInit {
  public product:any;
  public id_product:Number;

  constructor(private product_service:ProductService,
              private route:Router,
              private current:ActivatedRoute
    ) { 

      this.id_product= Number(this.current.snapshot.paramMap.get("id")) || 14;
      this.loadProduct();
    }

  ngOnInit() {}

  loadProduct(){
      this.product_service.getProduct(this.id_product).subscribe(data =>{
        this.product=data['product']
      });
  }
}
