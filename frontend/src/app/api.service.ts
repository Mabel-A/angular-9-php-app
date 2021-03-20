import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Policy } from  './policy';
import { Observable } from  'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
//définissez la PHP_API_SERVERvariable dans le service:
   PHP_API_SERVER = "http://127.0.0.1:80/angular-9-php-app/backend";

  constructor(private httpClient: HttpClient) { }
  //a readPolicies()méthode qui sera utilisée pour récupérer les polices d'assurance à partir du point de terminaison de l'API REST via une requête GET:
  readPolicies(): Observable<Policy[]>{
    return this.httpClient.get<Policy[]>(`${this.PHP_API_SERVER}/api/read.php`);
  }

    //la createPolicy()méthode qui sera utilisée pour créer une stratégie dans la base de données
   createPolicy(policy: Policy): Observable<Policy>{
    return this.httpClient.post<Policy>(`${this.PHP_API_SERVER}/api/create.php`, policy);
  }

    //la updatePolicy()méthode pour mettre à jour les stratégies
  updatePolicy(policy: Policy){
    return this.httpClient.put<Policy>(`${this.PHP_API_SERVER}/api/update.php`, policy);   
  }

    // les deletePolicy()stratégies de suppression de la base de données SQL
  deletePolicy(id: number){
    return this.httpClient.delete<Policy>(`${this.PHP_API_SERVER}/api/delete.php/?id=${id}`);
  }

}
