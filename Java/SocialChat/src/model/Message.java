package model;

public class Message {
	
	/** Id property */
	public int id;
	
	/** Author property */
	public String author;
	
	/** Message property */
	public String message;

	/** Construct
	 * 
	 * @param id
	 * @param author
	 * @param message
	 */
	public Message(int id, String author, String message) {
		super();
		this.id = id;
		this.author = author;
		this.message = message;
	}

	/** Retrieve id property
	 * 
	 * @return
	 */
	public int getId() {
		return id;
	}

	/** Set id property
	 * 
	 * @param id
	 */
	public void setId(int id) {
		this.id = id;
	}

	/** Retrieve author property
	 * 
	 * @return
	 */
	public String getAuthor() {
		return author;
	}

	/** Set author property
	 * 
	 * @param author
	 */
	public void setAuthor(String author) {
		this.author = author;
	}

	/** Retrieve message property
	 * 
	 * @return
	 */
	public String getMessage() {
		return message;
	}

	/** Set message property
	 * 
	 * @param message
	 */
	public void setMessage(String message) {
		this.message = message;
	}
}
