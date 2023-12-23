package service;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import metier.compte;


@WebService(serviceName = "banqueWS")
public class banqueService {
	private ArrayList<compte> lesComptes;
	private double convVall;

	

	public banqueService() {
		super();
		this.lesComptes = new ArrayList<>();
		this.lesComptes.add(new compte(1, 500));
		this.lesComptes.add(new compte(2, 450));
		this.lesComptes.add(new compte(3, 360));
		this.lesComptes.add(new compte(4, 820));
		this.lesComptes.add(new compte(5, 2500));
		this.lesComptes.add(new compte(6, 9560));
		this.lesComptes.add(new compte(7, 531));
		this.lesComptes.add(new compte(8, 5960));
		this.lesComptes.add(new compte(9, 1150));
		this.lesComptes.add(new compte(10, 4250));
		this.convVall = 3.18F;
	}


	public banqueService(ArrayList<compte> lesComptes, double convVall) {
		super();
		this.lesComptes = lesComptes;
		this.convVall = convVall;
	}

	
	@WebMethod
	public double conversionDtToEr(@WebParam(name = "x") double x) {
		// TODO Auto-generated method stub
		return x/ convVall;
	}
	

	@WebMethod
	public double conversionErToDt(@WebParam(name = "x") double x) {
		// TODO Auto-generated method stub
		return x * convVall;
	}

	@WebMethod
	public List<compte> getAllCompts() {
		// TODO Auto-generated method stub
		return lesComptes;
	}
	
	@WebMethod
	public boolean addCompt(@WebParam(name = "code") int code , @WebParam(name = "solde") float solde) {
		boolean res= false;
		if(lesComptes.get(lesComptes.size()-1).getCode()< code) {
			lesComptes.add(new compte(code, solde));
			res = true;
		}
			
		return res;
	}
	

	
	@WebMethod
	public void affAllCompts() {
		// TODO Auto-generated method stub
		Iterator<compte> i = lesComptes.iterator();
		while(i.hasNext()) {
			System.out.println((i.next()).toString());
		}
	}
	
	
}
