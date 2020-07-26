import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { QrPage } from './qr.page';

describe('QrPage', () => {
  let component: QrPage;
  let fixture: ComponentFixture<QrPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QrPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(QrPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
