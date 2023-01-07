package _20010310035_Burhan_Gül;

public class _20010310035_IR {

	public int value = 0;
	public  int getvalue() {
		System.out.println("X5 sinyali 1 yapıldı.");
		System.out.println("Mux’ların s2 s1 s0 seçim hatlarına 1 0 1 değeri uygulandı ve IR yazacının değeri veri yoluna aktarıldı.");
		System.out.println("Veri yolundaki değer: "+toBinary(value));

		return value;
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
	     for(int i = val.length();i<8;i++){
	    	 val = "0"+val;
	     }
	     return val;
	} 

}
