package serveur;

import javax.xml.ws.Endpoint;

import service.banqueService;

public class serceur {

	public static void main(String[] args) {
		
		Endpoint.publish("http://localhost:5000/", new banqueService());
		
		//felGoogle => http://localhost:5000/?wsdl
	}

}
