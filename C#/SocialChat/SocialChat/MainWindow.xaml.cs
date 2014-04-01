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

        private ObservableCollection<social_message> _messages;

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
                //_messages = new ObservableCollection<social_message>(entity.social_message.ToList());
                //MessagesList.ItemsSource = _messages;

                foreach (var panel in entity.social_message.ToList().Select(m => new MessageUserControl(m.author) {OriginalMessage = m.message}).Select(userControl => userControl.Display()))
                {
                    MainPanel.Children.Add(panel);
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
