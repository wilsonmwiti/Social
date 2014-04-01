using SocialChat.userControl;
using SocialChatDAL;
using System;
using System.Collections.ObjectModel;
using System.Linq;
using System.Windows;

namespace SocialChat
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        #region Attributs

        private ObservableCollection<MessageUserControl> _messages;

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
                var entity = new socialEntities();
                _messages = new ObservableCollection<MessageUserControl>();

                foreach (var messsageUserControl in entity.social_message.ToList().Select(m => new MessageUserControl(m.author) {OriginalMessage = m.message}))
                {
                    _messages.Add(messsageUserControl);
                    MainPanel.Children.Add(messsageUserControl);
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
