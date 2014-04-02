using SocialChat.userControl;
using SocialChatDAL;
using System;
using System.Collections.ObjectModel;
using System.Linq;
using System.Windows;
using SocialChatBusiness;

namespace SocialChat
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        #region Attributs

        private ObservableCollection<MessageUserControl> _messages;
        public ObservableCollection<MessageUserControl> Messages
        {
            get
            {
                return _messages;
            }
        }

        #endregion

        #region Construct

        /// <summary>
        /// Consttruct
        /// </summary>
        public MainWindow()
        {
            InitializeComponent();

            try
            {
                _messages = new ObservableCollection<MessageUserControl>();
                var newMessages = new Business().GetNewMessages();
                DataContext = _messages;

                foreach (var messsageUserControl in newMessages.Select(m => new MessageUserControl(m.author) { OriginalMessage = m.message }))
                {
                    _messages.Add(messsageUserControl);
                }
            }
            catch (Exception)
            {
            }
        }

        #endregion

        #region GUI Events

        #endregion
    }
}
