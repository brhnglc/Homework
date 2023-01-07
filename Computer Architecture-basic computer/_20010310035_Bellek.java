package _20010310035_Burhan_Gül;

public class _20010310035_Bellek {

	public int[] mr = new int[4096];
	
	_20010310035_Bellek() {
		for(int i=0;i<mr.length;i++) {
			mr[i] = mr.length-1-i;
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
	
	int get_val(int x) {
		System.out.println("Belleğin Read girişi aktif edildi.");
		System.out.println("X7 sinyali 1 yapıldı.");
		System.out.println("Mux’ların s2 s1 s0 seçim hatlarına 1 1 1 değeri uygulandı ve bellekten okunan değer veri yoluna aktarıldı.");
		System.out.println("Veri yolundaki değer: "+toBinary(mr[x]));
		return mr[x];
	}
	
	void give_val(int x,int y) {
		System.out.println("Belleğin Write girişi aktif edildi.");
		mr[x] = y;
		System.out.println("Bellekteki "+x+". adresteki değer "+toBinary(y)+" olarak güncellendi.");
	}
}
