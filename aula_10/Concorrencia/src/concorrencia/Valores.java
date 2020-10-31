package concorrencia;

public class Valores {

    int valor;
    private boolean bloqueado;

    public Valores() {
        bloqueado = false;
    }

    public synchronized int exibir() {
        while (!bloqueado) {
            try {
                wait(); // aguardar o processo de execução
            } catch (InterruptedException e) {

            }
        }
        bloqueado = false;
        notify(); // avisa que o processo foi liberado
        return this.valor;
    }

    public synchronized void guardar(int valor) {
        while (bloqueado) {
            try {
                wait();
            } catch (InterruptedException e) {

            }
        }
        this.valor = valor;
        bloqueado = true;
        notify();
    }
}
