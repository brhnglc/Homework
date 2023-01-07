package _20010310035_Burhan_Gül;

import java.util.Scanner;
import java.io.InputStreamReader;
public class _2013510001_Main {

	public static _20010310035_AR AR = new _20010310035_AR();
	public static _20010310035_TR TR = new _20010310035_TR();
	public static _20010310035_PC PC = new _20010310035_PC();
	public static _20010310035_DR DR = new _20010310035_DR();
	public static _20010310035_AC AC = new _20010310035_AC();
	public static _20010310035_Bellek Bellek = new _20010310035_Bellek();
	public static _20010310035_OUTR OUTR = new _20010310035_OUTR();
	public static _20010310035_IR IR = new _20010310035_IR();
	
	public static void main(String[] args) {


		String value2 ="E";
		while(value2.equals("E")) {
			System.out.print("Lütfen mikro işlemi giriniz:");	
			Scanner scanner = new Scanner(System.in);
			String value = scanner.nextLine();
			int asd =0;
			String[] arry = value.split(" <- ");
			String first = arry[0];
			String[] last = arry[1].split(" ");
			if(last.length == 3) {
				if(last[1].equals("+")) { 
					giveval(first,incrs_decrs(last[0]+"+"),false);
				}
				if(last[1].equals("-")) { 
					giveval(first,incrs_decrs(last[0]+"-"),false);
				}
			}
			if(last.length == 1) {
				if(last[0].charAt(0) == 'M') {
					giveval(first,Bellek.get_val(AR.value),true);
					
										
				}else if (last[0].charAt(0) == '0'){
					clr(first);
				}else if(first.charAt(0) =='M' ) {
					Bellek.give_val(AR.value,getval(last[0]));
				}else {
					giveval(first,getval(last[0]),true);
				}
			}
			System.out.println("\nDevam etmek istiyor musunuz? (E/H):");
			value2 = scanner.nextLine();
		}
	}
	
	public static void clr(String x) {
		switch (x){
			case "AR":
				AR.clear();
				break;
			case "PC":
				PC.clear();
				break;					
			case "DR":
				DR.clear();
				break;
			case "AC":
				AC.clear();
				break;
			case "TR":
				TR.clear();
				break;
		}
		
	}
	
	
	public static int incrs_decrs(String x) {
		
		if(x.substring(x.length()-1).equals("+")) {
			switch (x.substring(0,x.length()-1)){
				case "AR":
					return AR.incrs();
				case "PC":
					return PC.incrs();
				case "DR":
					return DR.incrs();
				case "AC":
					return AC.incrs();
				case "TR":
					return TR.incrs();
			}
		}else {
			switch (x.substring(0,x.length()-1)){
			case "AR":
				return AR.decrs();
			case "PC":
				return PC.decrs();
			case "DR":
				return DR.decrs();
			case "AC":
				return AC.decrs();
			case "TR":
				return TR.decrs();
		}
		}
		return -999;
	}
	
	
	
	public static int getval(String x) {
		switch (x){
		case "AR":
			return AR.getvalue();
		case "PC":
			return PC.getvalue();
		case "DR":
			return DR.getvalue();
		case "AC":
			return AC.getvalue();
		case "TR":
			return TR.getvalue();
		case "IR":
			return IR.getvalue();
		case "OUTR":
			return OUTR.getvalue();
		}
		return -99;	
	}
	public static void giveval(String x,int y,boolean z) {
		switch (x){
		case "AR":
			AR.value = y;
			if(z)
				System.out.print(x+" yazacının LD girişi aktif edildi.");
			System.out.print("AR yazacının güncel değeri:"+""+toBinary(AR.value));
			break;
		case "PC":
			 PC.value = y;
			 if(z)
					System.out.print(x+" yazacının LD girişi aktif edildi.");
			 System.out.print("PC yazacının güncel değeri:"+""+toBinary(PC.value));
			 break;
		case "DR":
			 DR.value = y;
			 if(z)
					System.out.print(x+" yazacının LD girişi aktif edildi.");
			 System.out.print("DR yazacının güncel değeri:"+""+toBinary(DR.value));
			 break;
		case "AC":
			 AC.value = y;
			 if(z)
					System.out.print(x+" yazacının LD girişi aktif edildi.");
			 System.out.print("AC yazacının güncel değeri:"+""+toBinary(AC.value));
			 break;
		case "TR":
			 TR.value = y;
			 if(z)
					System.out.print(x+" yazacının LD girişi aktif edildi.");
			 System.out.print("TR yazacının güncel değeri:"+""+toBinary(TR.value));
			 break;
		case "IR":
			 IR.value = y;
			 if(z)
					System.out.print(x+" yazacının LD girişi aktif edildi.");
			 System.out.print("IR yazacının güncel değeri:"+""+toBinary(IR.value));
			 break;
		case "OUTR":
			OUTR.value = y;
			 if(z)
					System.out.print(x+" yazacının LD girişi aktif edildi.");
			 System.out.print("OUTR yazacının güncel değeri:"+""+toBinary(OUTR.value));
			 break;
		}
		
	}
	
	public static String toBinary(int decimal){    
	     int binary[] = new int[40];    
	     int index = 0;    
	     String val="";
	     while(decimal > 0){    
	       binary[index++] = decimal%2;    
	       decimal = decimal/2;    
	     }    
	     for(int i = index-1;i >= 0;i--){    
	       val += binary[i];    
	     }    
	     for(int i = val.length();i<16;i++){
	    	 val = "0"+val;
	     }
	     return val;
	}    
}
