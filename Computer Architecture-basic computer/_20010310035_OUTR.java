package _20010310035_Burhan_Gül;

public class _20010310035_OUTR {
	public int value = 0;
	public  int getvalue() {
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
