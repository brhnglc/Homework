package _20010310035_Burhan_Gül;

public class _20010310035_AC {
	public int value = 0;
	int incrs() {
		System.out.print("AC yazacının INR girişi aktif edildi.");
		return value+1;
	}
	int decrs() {
		System.out.print("AC yazacının DCR girişi aktif edildi.");
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
	     for(int i = val.length();i<16;i++){
	    	 val = "0"+val;
	     }
	     return val;
	}    
	public  int getvalue() {
		System.out.println("X4 sinyali 1 yapıldı.");
		System.out.println("Mux’ların s2 s1 s0 seçim hatlarına 1 0 0 değeri uygulandı ve AC yazacının değeri veri yoluna aktarıldı.");
		System.out.println("Veri yolundaki değer: "+toBinary(value));
		return value;
	}
	public void clear() {
		value = 0;
		System.out.println("AC yazacının CLR girişi aktif edildi. AC yazacının güncel değeri: "+value);
	}

}
