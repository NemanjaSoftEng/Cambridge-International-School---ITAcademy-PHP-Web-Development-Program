import { Component, OnInit } from '@angular/core';
import { LocalStorageService } from '../local-storage.service';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrl: './form.component.css'
})
export class FormComponent implements OnInit{


  userInput: string = ``;
  phone:string;
  static localStorageCounter: number;
  items:string[]=[];

  
  dataList: string[] = [];



  constructor(private localStorageService:LocalStorageService){
    this.phone="";
    FormComponent.localStorageCounter = 1;
  }


  ngOnInit(): void {
    this.loadData();
  }

  addData(): void {
    if(this.userInput != "" && this.phone!=""){ 
      this.userInput += ' ' + this.phone;
      FormComponent.localStorageCounter++;
      let key_value = (FormComponent.localStorageCounter as unknown) as string;
      this.localStorageService.setItem("key",key_value);
      if (this.userInput.trim()) {
      this.dataList.push(this.userInput.trim());
      this.saveData();
      this.userInput = ``;
      }
      this.userInput="";
      this.phone="";
    }else{
      alert('Please insert name and phone number.');
    }
  }

  saveData(): void {
    localStorage.setItem(`dataList`+FormComponent.localStorageCounter, JSON.stringify(this.dataList));
    }

  loadData(): void {
    let key=this.localStorageService.getItem("key");
    FormComponent.localStorageCounter = (key as unknown) as number;
    const data = localStorage.getItem(`dataList`+FormComponent.localStorageCounter);
    if (data) {
      this.dataList = JSON.parse(data);
      }
    
  
  }

  
  retrieveFromLocalStorage() {
    if(FormComponent.localStorageCounter >=1){
    this.localStorageService.removeItem('dataList'+FormComponent.localStorageCounter);
    FormComponent.localStorageCounter--;
    let key_value = (FormComponent.localStorageCounter as unknown) as string;
    this.localStorageService.setItem("key",key_value);
    window.location.reload();
    }else{
      alert('Local storage is empty!');
    }
  }
  

  clearLocalStorage() {
    this.localStorageService.clear();
    if(FormComponent.localStorageCounter >=1){
    FormComponent.localStorageCounter=0;
    this.dataList = [];
    alert('Cleaning process is successful. Local Storage is empty, now!');
    }else{
      alert('Local storage is empty!');
    }
}

}


