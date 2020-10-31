package concorrencia;

public class Concorrencia {

    public static void main(String[] args) {
        Valores valor = new Valores();
        
        new Thread(new Produtor(valor)).start();
        new Thread(new Consumidor(valor)).start();
    }
}
