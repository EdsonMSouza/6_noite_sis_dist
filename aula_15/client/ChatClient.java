import java.io.*;
import java.net.*;

public class ChatClient{
	private String hostname;
	private int port;
	private String userName;

	public ChatClient(String hostname, int port){
		this.hostname = hostname;
		this.port = port;
	}

	public void execute(){
		try{
			Socket socket = new Socket(hostname, port);
			System.out.println("Connected to the chatserver");

			// instanciar as Threads
			new ReadThread(socket, this).start();
			new WriteThread(socket, this).start();

		} catch(UnknownHostException ex){
			System.out.println("Server not found: " + ex.getMessage());
		} catch (IOException ex){
			System.out.println("I/O erro: " + ex.getMessage());
		}
	}

	void setUserName(String userName){
		this.userName = userName;
	}

	String getUserName(){
		return this.userName;
	}

	// java ChatClient localhost 9515
	public static void main(String[] args){
		if(args.length < 2) return; // hostname and port

		String hostname = args[0];
		int port = Integer.parseInt(args[1]);

		ChatClient client = new ChatClient(hostname, port);
		client.execute();
	}
}