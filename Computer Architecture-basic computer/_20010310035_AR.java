package _20010310035_Burhan_Gül;

public class _20010310035_AR {
	public int value = 0;
	int incrs() {
		System.out.print("AR yazacının INR girişi aktif edildi.");
		return value+1;
	}
	int decrs() {
		System.out.print("AR yazacının DCR girişi aktif edildi.");
		return value-1;
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
	     for(int i = val.length();i<12;i++){
	    	 val = "0"+val;
	     }
	     return val;
	}    
	
	public  int getvalue() {
		System.out.println("X1 sinyali 1 yapıldı.");
		System.out.println("Mux’ların s2 s1 s0 seçim hatlarına 0 0 1 değeri uygulandı ve AR yazacının değeri veri yoluna aktarıldı.");
		System.out.println("Veri yolundaki değer: "+toBinary(value));
		return value;
	}
	public void clear() {
		value = 0;
		System.out.println("AR yazacının CLR girişi aktif edildi. AR yazacının güncel değeri: "+value);
	}
}


