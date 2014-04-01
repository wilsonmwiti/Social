namespace SocialChatDAL
{
    public partial class social_message
    {
        public override string ToString()
        {
            return string.Format("{0} : {1}", author, message);
        }
    }
}
